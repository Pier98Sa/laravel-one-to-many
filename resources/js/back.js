//eliminazione dei post dalla pagina
let buttons = document.getElementsByClassName("requestConfirm");

for (let i = 0; i < buttons.length; i++){
    buttons[i].addEventListener('click', function(){
        let form = this.getAttribute('data-formid');
        document.getElementById(form).submit();
    })
}