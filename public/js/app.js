let selectBox = document.querySelector('#filter_company_id'),
    deleteContactBtn = document.querySelectorAll('.btn-delete'),
    btnClear = document.querySelector('#btn-clear'),
    input = document.querySelector('#search');

deleteContactBtn.forEach(function (button){
    button.addEventListener('click', function (event){
        event.preventDefault();
        if(confirm("Are you sure?")){
            let action = this.getAttribute('href');
            let form = document.querySelector('#form-delete');
            form.setAttribute('action', action);
            form.submit();
        }
    })
})

if(selectBox){
    selectBox.addEventListener('change', function () {
        let companyId = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
        console.log(this.value);
    });
}

if(btnClear != null){
    btnClear.addEventListener('click', function () {
        input.value = "";
        selectBox.selectedIndex = 0;
        window.location.href = window.location.href.split('?')[0];
    });

    let toggleClearButton = () => {
        let query = location.search,
            pattern = /[?&]search=/;

        if (pattern.test(query)) {
            btnClear.style.display = 'block';
        } else {
            btnClear.style.display = 'none';
        }
    }

    toggleClearButton();
}




