//Отмена отправки с формы
$("#search_form").submit(function(event){
    event.preventDefault();                                 
    submitForm();
});

function submitForm(){
    var search = $("#search_input").val();                                        //Переменная с содержанием поля ввода

    if ($("#search_input").val().length > 3) {
    $("#search_input").removeClass('is-invalid');
    $.ajax({                                                                      //ajax запрос с проверкой количества символов
        type: "POST",
        url: "/testworkinline/php/search.php",
        data: "search=" + search,
        success : function(data){
            $("#result_search").html(data);                                     //Полученный результат
            //console.log(data);
        }
    }); } else {
        $("#search_input").addClass('is-invalid');                              //Вывод ошибки при недостаточном количестве символов
        $("#mes_err").prop('hidden', false);
    }
}