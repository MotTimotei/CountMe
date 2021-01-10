let std_prgLngs_btn2 = document.querySelector('.std_prgLngs_btn2');
let inner = '<div class="add_classes_div "><label for="search_class">Add class</label><input name="prg_search_class" id="search_class" type="text" class="add_std_inp" onkeyup="showAvailableClasses(this)"><div class="class_answ settings_scrBar2"><span class="class_answ_msg">Search for a class not listed above</span></div></div>';

function openOrClose(b){
    let a = new StudentSettings(b, inner, 'asdTRY');
    
    if(b.classList.contains('std_prgLngs_btn2')) a.close();
    else a.open();
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