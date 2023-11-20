<script>
function submitForm() {
    document.forms[0].submit();
}

document.addEventListener('keydown', function(event) {
    const target = event.target;

    if (event.key === 'Tab') {
        if (target.type === 'search') {
            if (target.value.trim() === '') {
                event.preventDefault(); 
                const currentURL = window.location.href;
                const baseUrl = currentURL.split('/')[3];
                window.location.href = '/' + baseUrl;
            } else {
                event.preventDefault(); 
                submitForm();
            }
        }
    }
});
</script>




