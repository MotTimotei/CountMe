let thm_view_add = document.querySelector('.thm_view_add');
let thm_bck_add = document.querySelector('.thm_bck_add');
let btn_theme_add = document.querySelector('.btn_theme_add');


btn_theme_add.addEventListener('click', function(){
    setNewThemeLayout(thm_view_add, thm_bck_add, btn_theme_add);
    let inner = '<span class="thm_text_new"><input type="text" maxlength="7" placeholder="Theme`s name"/></span><div class="thm_box_new"><div class="thm_text_box_new">AaaaBbbCcc</div><div class="thm_text_box_new thm__text_box__new">AaaaBbbCcc</div></div><div class="thm_box_new""><span class="thm_text2_new">AaaaBbbCcc</span></div>';
    
    insertNewThemeLayout(thm_bck_add, inner);
});

function setNewThemeLayout(a, b, c){
    a.classList.toggle('thm_view_new');
    b.classList.toggle('thm_bck_new');
    c.classList.toggle('btn_theme_new');
}

function insertNewThemeLayout(a, b){
    let div = document.createElement('div');
    div.classList = 'doarAsa';
    div.innerHTML = b;
    a.appendChild(div);
}
