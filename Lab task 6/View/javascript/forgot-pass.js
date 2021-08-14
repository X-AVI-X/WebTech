const email=document.getElementById('email')
const password=document.getElementById('password')
const cpassword=document.getElementById('cpassword')

const form = document.getElementById("form")


form.addEventListener('submit', (e) => {

    if (
        isEmpty(email, "Email") ||
        isEmpty(password, "Password") ||
        isEmpty(cpassword, "Confirm Password")
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