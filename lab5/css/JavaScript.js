document.addEventListener('DOMContentLoaded', function () {
    var textX = document.querySelector('.blokX').textContent;
    var textY = document.querySelector('.blokY').textContent;
    document.querySelector('.blokX').textContent = textY;
    document.querySelector('.blokY').textContent = textX;
});

document.addEventListener('DOMContentLoaded', function () {
    var length = 10;
    var width = 5;
    var area = calculateRectangleArea(length, width);
    var resultBlock = document.getElementById('resultBlock');
    resultBlock.textContent += '\n Площа прямокутника: ' + area;
});

function calculateRectangleArea(length, width) {
    return length * width;
}
function clean() {
    document.getElementById('valuesForm').reset();
}
function calculateMinMax() {
    var inputValues = document.getElementById('values').value;
    var valuesArray = inputValues.split(',').map(function (value) {
        if (!isNaN(value.trim())) {
            return Number(value.trim());
        } else {
            alert('Введено неправильне значення: ' + value.trim());
            return NaN; 
        }
    });
    valuesArray = valuesArray.filter(function (value) {
        return !isNaN(value);
    });
    if (valuesArray.length !== 10) {
        alert('Введіть рівно 10 чисел через кому.');
        return;
    }
    var min = Math.min(...valuesArray);
    var max = Math.max(...valuesArray);
    alert('Мінімум: ' + min + '\nМаксимум: ' + max);
    document.cookie = 'min=' + min;
    document.cookie = 'max=' + max;
    document.getElementById('valuesForm').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function () {
    var block5 = document.querySelector('.blok5');
    var checkbox = document.getElementById('boldCheckbox');   
    var isBold = localStorage.getItem('isBold');
    if (isBold === 'true') {
        block5.style.fontWeight = 'bold';
        checkbox.checked = true;
    }
    checkbox.addEventListener('change', function () {
        block5.style.fontWeight = this.checked ? 'bold' : 'normal';
        localStorage.setItem('isBold', this.checked);
    });
    block5.addEventListener('focus', function () {
        if (checkbox.checked) {
            block5.style.fontWeight = 'bold';
        }
    });
});

function showForm(blockNumber) {
    document.getElementById('dataForm' + blockNumber).style.display = 'block';
}

function hideForm(blockNumber) {
    document.getElementById('dataForm' + blockNumber).reset();
    document.getElementById('dataForm' + blockNumber).style.display = 'none';
}

function saveData(blockNumber) {
    var inputData = document.getElementById('dataInput' + blockNumber).value;
    var existingData = localStorage.getItem('tableData' + blockNumber);
    var dataArray = existingData ? JSON.parse(existingData) : [];
    dataArray.push(inputData);
    localStorage.setItem('tableData' + blockNumber, JSON.stringify(dataArray));
    document.getElementById('dataForm' + blockNumber).reset();
    hideForm(blockNumber);
    var initialHTML = {};
    for (var i = 1; i <= 6; i++) {
        initialHTML[i] = document.querySelector('.blok' + i).innerHTML;
    }
}

function updateTable(blockNumber) {
    if (localStorage.getItem('tableData' + blockNumber) !== null) {
        var tableData = localStorage.getItem('tableData' + blockNumber);
        var dataArray = tableData ? JSON.parse(tableData) : [];
        var tableHTML = '<table border="1">';
        for (var i = 0; i < dataArray.length; i++) {
            tableHTML += '<tr><td>' + dataArray[i] + '</td></tr>';
        }
        tableHTML += '</table>';
        document.querySelector('.blok' + blockNumber).innerHTML = tableHTML;
    }
}

window.onload = function () {
    var cookies = document.cookie;
    if (cookies !== "") {
        var reloadcookies = confirm('Є збережені дані в cookies. Бажаєте їх відновити?');
        if (reloadcookies) {
            document.getElementById('valuesForm').style.display = 'none';
            alert(document.cookie);
            alert('Відновлені дані:\nМінімум: ' + min + '\nМаксимум: ' + max);
        } else {
            document.cookie = 'min=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'max=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            location.reload();
        }
    }
    var reloadlocalStorage = confirm('Бажаєте вивести таблиці з localStorage?');
    if (reloadlocalStorage) {
        for (var i = 1; i <= 6; i++) {
            updateTable(i);
        }
    } else {
        for (var i = 1; i <= 6; i++) {
            document.querySelector('.blok' + blockNumber).innerHTML = initialHTML[i];
        }
    }   
}