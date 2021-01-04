let std_prgLngs_btn = document.querySelector('.std_prgLngs_btn');
    let std_prgLngs_ = document.querySelector('.std_prgLngs_');

    std_prgLngs_btn.addEventListener('click', function(){
        opcl();


    });

    function opcl(){
        if(std_prgLngs_.classList.contains('std_prgLngs_2')) remove_delete();
        else {
             print();
             document.querySelectorAll('.prgrm_lngs').forEach(elem => {
                elem.addEventListener('keyup', function(){
                    console.log(validate());
                });
            });
            }
        std_prgLngs_.classList.toggle('std_prgLngs_2');
        std_prgLngs_btn.classList.toggle('std_prgLngs_btn2');
    }

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
        
    }

    function remove_delete(){
        let inp_lbl = document.querySelectorAll('.inp_lbl');
        inp_lbl.forEach(elem => {
            elem.remove();
        });
        
    }


    function validate(){
        let prgrm_lngs = document.querySelectorAll('.prgrm_lngs');

        prgrm_lngs.forEach(elem => {
            return elem.value
        });
    }


