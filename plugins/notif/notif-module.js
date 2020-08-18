function notify(content,color,icon) {
    $.amaran({
        delay: 5000,
        content:{
            bgcolor: color,
            message: '<strong class="text-white"><i class="fas '+icon+' mr-2"></i> '+content+'</strong>'
            },
        theme:'colorful'
    });
}