//open&close section settings
function openOrClose(b){
    let inner = '<div class="inp_lbl"><label for="prg_name">Name</label><input name="prg_name" id="prg_name" type="text" class="add_std_inp prgrm_lngs" onkeyup="checkforValue(this)" value="" required></div>  <div class="inp_lbl"><label for="prg_ses_tm">Session time</label><input name="prg_ses_tm" id="prg_ses_tm" type="number" class="add_std_inp prgrm_lngs" onkeyup="checkforValue(this)" value="" required></div>  <div class="inp_lbl"><label for="prg_cost">Hour cost</label><input name="prg_cost" id="prg_cost" type="number" class="add_std_inp prgrm_lngs" onkeyup="checkforValue(this)" value="" required></div><div class="add___"></div>'

    let a = new StudentSettings(b, inner, 'asdTRY')
    if(b.classList.contains('std_prgLngs_btn2'))a.close ()
    else a.open()
}

function checkforValue(a){
    let array = [];
    document.querySelectorAll('.prgrm_lngs').forEach(element => {
        array.push(element.value)
    });

    let addBtn = () => {
        if(!document.querySelector('.std_prgLngs_btn__')){
            let a = document.createElement('button')
            a.setAttribute('type', 'submit')
            a.setAttribute('assignment', 'add')
            a.classList = 'std_prgLngs_btn__'
            a.setAttribute('onclick', 'addClass()')
            document.querySelector('.add___').appendChild(a);
        }
    }

    let delBtn = () => {
        if(document.querySelector('.std_prgLngs_btn__')) document.querySelector('.std_prgLngs_btn__').remove();
    }

    (array.includes('')) ? delBtn() : addBtn();

}

class StudentSettings {
    constructor(elem, inner, div) {
        this.elem = elem;
        this.inner = inner;
        this.div = div;

        this.open = () => {
            this.elem.classList.toggle('std_prgLngs_btn2');
            this.elem.parentElement.classList.toggle('std_prgLngs_2');
            let a = document.createElement('div');
            a.classList = this.div;
            a.innerHTML = this.inner;
            this.elem.parentElement.appendChild(a);
        };

        this.close = () => {
            this.elem.classList.toggle('std_prgLngs_btn2');
            this.elem.parentElement.classList.toggle('std_prgLngs_2');
            let div_class = '.'.concat(this.div);
            document.querySelector(div_class).remove();
        };

    }
}



