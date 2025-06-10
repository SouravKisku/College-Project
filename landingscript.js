document.getElementById('openFormBtn').addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'flex';
    document.getElementById('content').style.filter = 'blur(5px)';
});
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        document.getElementById('popupForm').style.display = 'none';
        document.getElementById('content').style.filter = 'none';
    }
});