$('.form-file-input').on('click', function(){
    const input = this.querySelector('input[type=file]');
    input.click();
    $(input).on('change', function(){
        $(this).parent().find('span').text(this.files[0].name);
        console.log(this.files[0].name);
    });
});