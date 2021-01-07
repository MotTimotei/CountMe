let thm_view_add = document.querySelector('.thm_view_add');
let thm_bck_add = document.querySelector('.thm_bck_add');
let btn_theme_add = document.querySelector('.btn_theme_add');
let inner = '<span class="thm_text_new">Theme`s name</span><div class="thm_box_new"><div class="thm_text_box_new">AaaaBbbCcc</div><div class="thm_text_box_new thm__text_box__new">AaaaBbbCcc</div></div><div class="thm_box_new""><span class="thm_text2_new">AaaaBbbCcc</span></div>';
let inner2 = '<div class="thm_nm"><label for="theme_name">Primary color</label><input name="theme_name" id="theme_name" class="add_std_inp theme_name theme_inp_to_add" type="text" maxlength="30" placeholder="Theme`s name" required><label for="prim_color">Primary color</label><input name="prim_color" id="prim_color" class="add_std_inp theme_color theme_inp_to_add" type="text" maxlength="7" placeholder="#333333" required><label for="sec_color">Secondary color</label><input name="sec_color" id="sec_color" class="add_std_inp theme_color theme_inp_to_add" type="text" maxlength="7" placeholder="#434343" required><label for="thrd_color">Third color</label><input name="thrd_color" id="thrd_color" class="add_std_inp theme_color theme_inp_to_add" type="text" maxlength="7" placeholder="#0077ff" required><label for="prim_font">Primary font</label><input name="prim_font" id="prim_font" class="add_std_inp theme_color theme_inp_to_add" type="text" maxlength="7" placeholder="#b5b5b5" required><label for="sec_font">Secondary font</label><input name="sec_font" id="sec_font" class="add_std_inp theme_color theme_inp_to_add" type="text" maxlength="7" placeholder="#57b957" required></div>'
let inner3 = '<div class="thm_bck"><span class="thm_text"></span><div class="thm_box"><div class="thm_text_box">AaaaBbbCcc</div><div class="thm_text_box thm__text_box_">AaaaBbbCcc</div></div><div class="thm_box""><span class="thm_text2">AaaaBbbCcc</span></div></div>';

let themes_stngs = document.querySelector('.themes_stngs');

asd(thm_view_add, thm_bck_add, btn_theme_add, inner, inner2, themes_stngs, inner3);

function asd(a, b, c, d, e, f, g){
    c.addEventListener('click', function(){
        insert_remove();
        validateColors();
        
    });


    function insert_remove(){
        (document.querySelector('.thm_bck_new__')) ? removeThemeLayout() : insertNewThemeLayout();
    }

    function newTheme_addTheme(){
        a.classList.toggle('thm_view_new');
        b.classList.toggle('thm_bck_new');
        setTimeout(function(){c.classList.toggle('btn_theme_new');},400)
        
    }

    function insertNewThemeLayout(){
        setTimeout(function(){
            let div = document.createElement('div');
            div.classList = 'thm_bck_new__';
            div.innerHTML = d;
            a.appendChild(div);
        }, 600);

        let div = document.createElement('div');
        div.classList = 'new_thm_setup';
        div.innerHTML = e;
        f.appendChild(div);

        setTimeout(function(){
            document.querySelector('.new_thm_setup').classList.add('new_thm_setup_new');
        }, 600);

        newTheme_addTheme();
        let i = 0;
        let timi = setInterval(function(){
            if(i < 780){
                i+=10;
                document.querySelector('.add_std_').scrollTo(0, document.querySelector('.add_std_').scrollHeight);
            } else clearInterval(timi);
            }, 10);

    }

    function removeThemeLayout(){
        document.querySelector('.new_thm_setup').classList.remove('new_thm_setup_new');
        setTimeout(function(){
            document.querySelector('.thm_bck_new__').remove();
            document.querySelector('.new_thm_setup').remove();
            newTheme_addTheme()
        }, 500);
    }

    function validateColors(){
        document.querySelectorAll('.theme_color').forEach(elem => {
            elem.addEventListener('keyup', function(){
                console.log(getInpValues(document.querySelectorAll('.theme_color')));
                (!getInpValues(document.querySelectorAll('.theme_color'))) ? kill() : validate() ;
            });
        });

        let getInpValues = (a) =>{
            let theme = new Theme();
            a.forEach(elem => {
                theme.value = elem.value;
                if(!theme.isHexColor()) {return false};
            }); return true;
        }

        let validate = () =>{
            if(!document.querySelector('.std_prgLngs_btn___')){
                let div = document.createElement('button');
                div.classList = 'std_prgLngs_btn___';
                div.setAttribute('type', 'button');
                div.setAttribute('assignment', 'add');
                document.querySelector('.new_thm_setup_new').appendChild(div);
            }
            document.querySelector('.std_prgLngs_btn___').addEventListener('click', addNewTheme);
           }

        let kill = () =>{
            if(document.querySelector('.std_prgLngs_btn___')) document.querySelector('.std_prgLngs_btn___').remove();
        }
    }

    function addNewTheme(){
        let div = document.createElement('div');
        div.classList = 'thm_view';
        div.innerHTML = g;
        div.setAttribute('selected', 'no');
        document.querySelector('.themes_displayed').appendChild(div);


        a.cloneNode(true);
        document.querySelector('.themes_displayed').appendChild(a);
    }

}