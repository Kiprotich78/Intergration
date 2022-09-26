let myArray = new Array();

for (let i = 1; i < 50000; i++){
    let randNumber = Math.floor(Math.random() * 100000);
    //console.log(randNumber);

    myArray[i] = randNumber + ", ";
    
}

//console.log(myArray);

const file = new File(myArray, '50000range.txt', {
    type: 'text/plain',
})

function download() {
    const link = document.createElement('a')
    const url = URL.createObjectURL(file)
    link.href = url
    link.download = file.name
    document.body.appendChild(link)
    link.click()
    document.body.removeChild(link)
    window.URL.revokeObjectURL(url)
}
download()
