const uname=document.getElementById('uname')
const password=document.getElementById('password')

const form = document.getElementById("form")


form.addEventListener('submit', (e) => {

    if (
        isEmpty(uname, "Username") ||
        isEmpty(password, "Password")
    )
        e.preventDefault()
});

function isEmpty (element, msg)
{
    if (element.value === '' ||  element.value == null)
    {
       window.alert(msg+ " is empty")
       return true
    }
    else return false
}