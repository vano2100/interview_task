const salaryInput = document.getElementById('emp_salary')
const mortgageCheck = document.getElementById('emp_mortgage')


const savebtn = document.getElementById('emp_save')

savebtn.addEventListener('click',(event) => {
        if (check())
        {
            return true
        } else {
            event.preventDefault()
            alert('С ипотекой за должна быть выше 45000!')
            return false
        }
},false)

salaryInput.onblur = function(){
    let salary = parseInt(salaryInput.value)
    if (!Number.isInteger(salary)){
        alert('В поле зп должно быть число!')
        salaryInput.value = '10001'
        salaryInput.focus()
    }  else if (salary < 10000) {
        alert('За такую ЗП даже студенты не работают!')
        salaryInput.value = '10001'
        salaryInput.focus()
    }
}

function check(){
    if (mortgageCheck && salaryInput.value < 40000){
        return false
    }
    return true
}

