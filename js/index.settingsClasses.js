let std_prgLngs_btn = document.querySelector('.std_prgLngs_btn');
let std_prgLngs_ = document.querySelector('.std_prgLngs_');



//open&close section settings
std_prgLngs_btn.addEventListener('click', function(){
    opcl();
    verify();
});

//check if section is closed or open
function opcl(){
    (std_prgLngs_.classList.contains('std_prgLngs_2')) ? remove_delete() : print();
}

//print out section's elements 
function print(){
    const ar = [
        ['Name', 'prg_name', 'text'], 
        ['Session time', 'prg_ses_tm', 'number'], 
        ['Hour cost', 'prg_cost', 'number']
    ];
    let form = document.createElement('form');
    form.classList = 'form_add_class';
    form.setAttribute('mothod', 'post');
    form.setAttribute('enctype', 'multipart/form-data');
    std_prgLngs_.appendChild(form);

    for(let i = 0;i<ar.length;i++){
        let div = document.createElement('div');
        div.classList = 'inp_lbl';
        div.innerHTML = '<label for="'+ar[i][1]+'">'+ar[i][0]+'</label><input name="'+ar[i][1]+'" id="'+ar[i][1]+'" type="'+ar[i][2]+'" class="add_std_inp prgrm_lngs" value="" required>';
        document.querySelector('.form_add_class').appendChild(div);
    }
    elemsToggle();
}

//remove all section's elements
function remove_delete(){
    
    if(!validate(document.querySelectorAll('.prgrm_lngs'))){
        document.querySelector('.form_add_class').remove();
        elemsToggle();
    }
    
}

//toggle the element's class in order to check 
//if the section is closed or open
function elemsToggle(){
    std_prgLngs_.classList.toggle('std_prgLngs_2');
    std_prgLngs_btn.classList.toggle('std_prgLngs_btn2');
}

//get value of inputs inside the settings section and store them
//into an array to be send vor validation
function getInpValues(a){
    let array = [];
    a.forEach(elem => {
        array.push(elem.value);
    });
    return array;
}


//check if the inputs values are empty or not
function validate(a){
    return (getInpValues(a).includes(''))?false : true;
}

//check on every keyup if every input has a value
function verify(){
    let prgrm_lngs = document.querySelectorAll('.prgrm_lngs');
    prgrm_lngs.forEach(elem => {
        elem.addEventListener('keyup', function(){
            (validate(prgrm_lngs))? setElem() : delElem();
        });
    });
}

//
function setElem(){
    if(!document.querySelector('.std_prgLngs_btn__')){
        let a = document.createElement('button')
        a.setAttribute('type', 'submit')
        a.setAttribute('assignment', 'add')
        a.classList = 'std_prgLngs_btn__'
        document.querySelector('.form_add_class').appendChild(a);
    } 
        document.querySelector('.std_prgLngs_btn__').addEventListener('click', setLanguage);
}

function delElem(){
    let std_prgLngs_btn__ = document.querySelector('.std_prgLngs_btn__');
    if(std_prgLngs_btn__) std_prgLngs_btn__.remove();
}



function setLanguage(){
    displayAllClasses('1');
    let prgrm_lngs = document.querySelectorAll('.prgrm_lngs');
    addClass('1', prgrm_lngs[0].value, prgrm_lngs[1].value, prgrm_lngs[2].value);
    prgrm_lngs.forEach(elem => {
        elem.value = '';
    });
    delElem();
}

class removeClass {
    constructor() {
        this.remove_delete_class = () => {
            this.warning();
            this.delNo();
            this.delYs();
        }
        this.warning = () => {
            if (!document.querySelector('.warning_bg')) {
                let a = document.createElement('div');
                a.classList = 'warning_bg';
                a.innerHTML = '<div class="warning_bg2"><span class="warning_msg_">Remove class?</span> <button class="warning_delete" delete="yes" type="button">YES</button><button class="warning_delete" delete="no" type="button">NO</button></span><input type="hidden" class=""warning_delete_input" value=""></div>';
                document.querySelector('.visOFF').appendChild(a);
            }
        };

        this.giveUp = () => {
            if (document.querySelector('.warning_bg'))
                document.querySelector('.warning_bg').remove();
        };

        this.deleteClass = (a) => {
            removeClassDB(a);
            giveUp();
            displayAllClasses('1');
        };

        this.delYs = (a) => {
            document.querySelector('[delete="yes"]').addEventListener('click', function () {
                deleteClass(a);
            });
        };

        this.delNo = () => {
            document.querySelector('[delete="no"]').addEventListener('click', giveUp);
        };
    }
}

