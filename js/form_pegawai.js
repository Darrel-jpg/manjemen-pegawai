const selectImg = document.querySelector('#selectImg');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('#imgArea');

selectImg.addEventListener('click', function() {
    inputFile.click();
});

inputFile.addEventListener('change', function() {
    const image = this.files[0]
    const reader = new FileReader();
    reader.onload = () => {
        const allImg = imgArea.querySelectorAll('img');
        allImg.forEach(item => item.remove());
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        img.classList.add(
            'absolute',
            'top-0',
            'left-0',
            'w-full',
            'h-full',
            'object-cover',
            'object-center'
        );
        imgArea.appendChild(img);
        imgArea.classList.add('active');
        imgArea.dataset.img = image.name;
    }
    reader.readAsDataURL(image);
});