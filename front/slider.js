let offset = 0 //смещение от левого края
const sliderLine = document.querySelector('.slider-line')
document.getElementById('slider-next').addEventListener('click', () => {
    offset += 1272
    if (offset > 2548) {
        offset = 0
    }
    sliderLine.style.left = -offset + "px"
})
document.getElementById('slider-prev').addEventListener('click', () => {
    offset -= 1272
    if (offset < 0) {
        offset = 2548
    }
    sliderLine.style.left = -offset + "px"
})