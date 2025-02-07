document.addEventListener('DOMContentLoaded', function() {

    let cont5 = 0, cont4 = 0, cont3 = 0, cont2 = 0, cont1 = 0;
    let porc5 = 0, porc4 = 0, porc3 = 0, porc2 = 0, porc1 = 0;
    let size = 0, sizeUnit = 0;
    let arrayElements = 0;

    const userDataElement = document.querySelector('#individualReputation');
    const reputation = JSON.parse(userDataElement.getAttribute('data-rate'));

    arrayElements = Object.keys(reputation);

    size = arrayElements.length;
    sizeUnit = pluralize(size, "rating", "ratings");

    if(size != 0) {

        reputation.forEach(element => {
            if(element.calification == 5) {
                cont5+= 1;
            }else if(element.calification == 4) {
                cont4+= 1;
            }else if(element.calification == 3) {
                cont3+= 1;
            }else if(element.calification == 2) {
                cont2+= 1;
            }else if(element.calification == 1) {
                cont1+= 1;
            }
        });

        porc5 = (cont5*100) / size;
        porc4 = (cont4*100) / size;
        porc3 = (cont3*100) / size;
        porc2 = (cont2*100) / size;
        porc1 = (cont1*100) / size;

        document.querySelector('#star5').textContent = `${porc5} %`;
        document.querySelector('#star5color').style.width = `${porc5}%`;

        document.querySelector('#star4').textContent = `${porc4} %`;
        document.querySelector('#star4color').style.width = `${porc4}%`;

        document.querySelector('#star3').textContent = `${porc3} %`;
        document.querySelector('#star3color').style.width = `${porc3}%`;

        document.querySelector('#star2').textContent = `${porc2} %`;
        document.querySelector('#star2color').style.width = `${porc2}%`;

        document.querySelector('#star1').textContent = `${porc1} %`;
        document.querySelector('#star1color').style.width = `${porc1}%`;
        
        document.querySelector('#totalRating').textContent = sizeUnit;
    }

});

function pluralize(count, singular, plural) {
    return count === 1 ? `${count} ${singular}` : `${count} ${plural}`;
}