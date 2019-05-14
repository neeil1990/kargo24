/**
 * @return {string}
 */
function ArrToString(el) {
    if(el.length > 0){
        var name = [];
        for (var i = 0; i < el.length; i++)
        {
            name[i] = el[i].name;
        }
        return name.join(', ');
    }else{
        alert('Нет фото!');
    }
    return false;
}