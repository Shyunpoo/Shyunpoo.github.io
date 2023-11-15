// Menu reponsive (Début)
document.getElementById('mobile-menu').addEventListener('click', function() {
    var menu = document.getElementById('menu');
    menu.classList.toggle('active');
});
// Menu reponsive (Fin)

/* function drag(event) {
    event.dataTransfer.setData('text', event.target.id);
}

document.addEventListener('dragover', function(event) {
    event.preventDefault();
});

document.addEventListener('drop', function(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData('text');
    var draggedElement = document.getElementById(data);

    // Get the drop coordinates
    var x = event.clientX;
    var y = event.clientY;

    // Set the position of the dragged element
    draggedElement.style.position = 'fixed';
    draggedElement.style.left = x - draggedElement.width / 2 + 'px';
    draggedElement.style.top = y - draggedElement.height / 2 + 'px';
}); */ 