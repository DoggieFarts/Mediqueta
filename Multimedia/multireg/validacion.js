var form  = document.getElementById('form');
var input = document.getElementById('email');


var elem               = document.createElement('div');
    elem.id            = 'notify';
    elem.style.display = 'none';
    form.appendChild(elem);

input.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        elem.textContent   = 'Inserta por lo menos un @';
        elem.className     = 'error';
        elem.style.display = 'block';
 
        input.className    = 'invalid animated shake';
    }
});

