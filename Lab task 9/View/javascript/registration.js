const form = document.getElementById('reg-form')
const fullname= document.getElementById('name')
const gender= document.getElementsByName('gender')
const city= document.getElementById('city')
const paddress= document.getElementById('paddress')
const peraddress= document.getElementById('peraddress')
const phone= document.getElementById('phone')
const email= document.getElementById('email')
const uname=document.getElementById('uname')
const password=document.getElementById('password')
const cpassword= document.getElementById('cpassword')


form.addEventListener('submit', (e) => {

    if (
        isEmpty(fullname, "Full name") ||
        isEmpty(city, "City") ||
        isEmpty(paddress, "Present Address") ||
        isEmpty(peraddress, "Permenet Address") ||
        isEmpty(phone, "Phone number") ||
        isEmpty(email, "E-mail") ||
        isEmpty(uname, "Username") ||
        isEmpty(password, "Password") ||
        isEmpty(cpassword,"Confirm password")
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