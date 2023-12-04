function calculate(operator) {
    // Get input values
    var num1 = parseFloat(document.getElementById('num1').value);
    var num2 = parseFloat(document.getElementById('num2').value);
    
    // Check if the entered values are valid integers
    if (isNaN(num1) || isNaN(num2)) {
        alert('Please enter valid integers');
        return;
    }

    // Perform calculation based on the operator
    var result;
    switch (operator) {
        case '+':
            result = num1 + num2;
            break;
        case '-':
            result = num1 - num2;
            break;
        case '*':
            result = num1 * num2;
            break;
        case '/':
            if (num2 === 0) {
                alert('Cannot divide by ZERO');
                return;
            }
            result = num1 / num2;
            break;
        default:
                alert('Invalid operator');
                return;
    }

    // Display the result
    document.getElementById('result').value = result;
}
