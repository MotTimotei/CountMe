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

    for(let i = 0;i<ar.length;i++){
        let div = document.createElement('div');
        div.classList = 'inp_lbl';
        div.innerHTML = '<label for="'+ar[i][1]+'">'+ar[i][0]+'</label><input name="'+ar[i][1]+'" id="'+ar[i][1]+'" type="'+ar[i][2]+'" class="add_std_inp prgrm_lngs" value="" required>';
        std_prgLngs_.appendChild(div);
    }
    elemsToggle();
}

//remove all section's elements
function remove_delete(){
    
    let inp_lbl = document.querySelectorAll('.inp_lbl');
    if(!validate(document.querySelectorAll('.prgrm_lngs'))){
        inp_lbl.forEach(elem => {
            elem.remove();
        });
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
        a.setAttribute('type', 'button')
        a.setAttribute('assignment', 'add')
        a.classList = 'std_prgLngs_btn__'
        document.querySelector('.std_prgLngs_').appendChild(a);
    } 
        document.querySelector('.std_prgLngs_btn__').addEventListener('click', setLanguage);
}

function delElem(){
    let std_prgLngs_btn__ = document.querySelector('.std_prgLngs_btn__');
    if(std_prgLngs_btn__) std_prgLngs_btn__.remove();
}



function setLanguage(){
    let prgrm_lngs = document.querySelectorAll('.prgrm_lngs');
    let elem = document.createElement('span');
    elem.setAttribute('owned', 'selected');
    elem.classList = 'std_prgLngs';
    elem.innerHTML = prgrm_lngs[0].value+'<span class="std_prgLngs_cls"></span>';
    document.querySelector('.classes').appendChild(elem);
    prgrm_lngs.forEach(elem => {
        elem.value = '';
    });
    delElem();
    removeClass();
}

function removeClass(){
    let std_prgLngs = document.querySelectorAll('[owned="selected"]');
    std_prgLngs.forEach(elem => {
        let a = elem.children[0];
        a.addEventListener('click', function(){
            
            this.parentNode.remove();
        })
    });

}