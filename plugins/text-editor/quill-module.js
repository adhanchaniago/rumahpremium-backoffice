/* == TEXT EDITOR == */
var quill_editor = document.getElementById('editor');
if(quill_editor != null)
{
    var toolbarOptions = [
        ['bold', 'italic', 'underline'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }], 
        [{ 'align': [] }],
        ['blockquote']
    ];
    
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow',
        placeholder: '',
        clipboard: {
            matchVisual: false
        }
    });



    $(document).ready(function() {
        $('#editor').keyup(function() {

            var about = document.querySelector('input.editor');
            about.value = JSON.stringify(quill.root.innerHTML.trim());
            return false;
        });
    });
}
/* == #TEXT EDITOR == */