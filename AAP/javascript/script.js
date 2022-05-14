let photo = document.getElementById("ImgPhoto");
let file = document.getElementById("imagem");


photo.addEventListener('click', () =>{
    file.click();
});

file.addEventListener('change', (e) =>{
    let reader = new FileReader();
    reader.onload = () =>{
        photo.src = reader.result;
    }

    reader.readAsDataURL(file.files[0]);
});