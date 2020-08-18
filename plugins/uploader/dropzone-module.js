Dropzone.autoDiscover = false;
$('.upload-multiplefile').each(function()
{
    var foldername = $(this).data('foldername');
    var foldercode = $(this).data('code');
    var filename = Math.random().toString(36).substring(7);
    var iduser = $(this).data('iduser');
    var accept = $(this).data('accept');
    var size = $(this).data('size');
    var fileupload = $(this).data('fileupload');
    var filetotal = 0;
    var mockFile;
    if(fileupload != '')
    {
        mockFile = { name: fileupload, accepted: true};
    }
    $(this).dropzone({
        url: base_url+'temporary/uploadmultiplefile/'+foldername+'/'+foldercode+'/'+filename,
        method:'post',
        paramName:'file',
        maxFiles: 6,
        maxFilesize: size,
        addRemoveLinks:true,
        dictRemoveFile: 'Hapus File',
        acceptedFiles: accept,
        accept: function(file, done) {
            var thumbnail;
            switch (file.type) {
                case 'application/pdf':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/pdf.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/pdf.png');
                done();
                break;
                case 'application/msword':
                case 'application/doc':
                case 'application/docx':
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/doc.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/doc.png');
                done();
                break;
                case 'image/jpeg':
                case 'image/jpg':
                case 'image/png':
                done();
                break;
            }
        },
        init: function() {
            this.on('maxfilesexceeded', function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
            this.on('error', function(file,resp) {
                if(resp != 'You can not upload any more files.')
                {
                    this.removeFile(file);
                    $('.upload-file-'+foldername).siblings('.invalid-feedback').html('File tidak dapat diunggah<br>Mohon coba file lain');
                }
            });
            this.on('addedfile', function(file) {
                filetotal = filetotal+1;
                $('.upload-filetotal-'+foldername).val(filetotal);
                var file_type;
                switch (file.type) {
                    case 'application/pdf':
                    file_type = 'pdf';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/doc':
                    case 'application/msword':
                    file_type = 'doc';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/docx':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    file_type = 'docx';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'image/jpeg':
                    case 'image/jpg':
                    file_type = 'jpg';
                    break;
                    case 'image/png':
                    file_type = 'png';
                    break;
                }
                $('.upload-file-'+foldername).val(filename+'.'+file_type);
                $('.upload-file-'+foldername).addClass('valid');
                $('.upload-file-'+foldername).removeClass('is-invalid');
            });
            this.on('removedfile', function(file){
                filetotal = filetotal-1;
                $('.upload-filetotal-'+foldername).val(filetotal);
                var file_type;
                switch (file.type) {
                    case 'application/pdf':
                    file_type = 'pdf';
                    $('.preview-file-'+foldername).html('');
                    break;
                    case 'application/doc':
                    case 'application/msword':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    file_type = 'doc';
                    $('.preview-file-'+foldername).html('');
                    break;
                    case 'application/docx':
                    file_type = 'docx';
                    break;
                    case 'image/jpeg':
                    case 'image/jpg':
                    file_type = 'jpg';
                    break;
                    case 'image/png':
                    file_type = 'png';
                    break;
                }
                $('.upload-file-'+foldername).siblings('.invalid-feedback').html('Minimal 1 foto diunggah');
                $.ajax({
                    url: base_url+'temporary/removefiletemp',
                    type: 'POST',
                    data: {
                        'file': filename+'.'+file_type,
                        'type': foldername,
                        'foldercode': foldercode,
                        'id_user': iduser,
                    }
                });
                if(filetotal == 0)
                {
                    $('.upload-file-'+foldername).val('');
                    $('.upload-file-'+foldername).addClass('is-invalid');
                    $('.upload-file-'+foldername).removeClass('valid');                    
                }
            });
        },
    });
});

$('.upload-file').each(function()
{
    var foldername = $(this).data('foldername');
    var foldercode = $(this).data('code');
    var filename = Math.random().toString(36).substring(7);
    var iduser = $(this).data('iduser');
    var accept = $(this).data('accept');
    var size = $(this).data('size');
    var fileupload = $(this).data('fileupload');
    var mockFile;
    if(fileupload != '')
    {
        mockFile = { name: fileupload, accepted: true};
    }
    $(this).dropzone({
        url: base_url+'temporary/uploadfile/'+foldername+'/'+foldercode+'/'+filename,
        method:'post',
        paramName:'file',
        maxFiles: 1,
        maxFilesize: size,
        addRemoveLinks:true,
        dictRemoveFile: 'Hapus File',
        acceptedFiles: accept,
        accept: function(file, done) {
            var thumbnail;
            switch (file.type) {
                case 'application/pdf':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/pdf.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/pdf.png');
                done();
                break;
                case '.csv':
                case 'application/vnd.ms-excel':
                case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                case 'application/msword':
                case 'application/doc':
                case 'application/docx':
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/doc.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/doc.png');
                done();
                break;
                case 'image/jpeg':
                case 'image/jpg':
                case 'image/png':
                done();
                break;
            }
        },
        init: function() {
            this.on('maxfilesexceeded', function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
            this.on('error', function(file,resp) {
                if(resp != 'You can not upload any more files.')
                {
                    alert(resp);
                    this.removeFile(file);
                    $('.upload-file-'+foldername).siblings('.invalid-feedback').html('File tidak dapat diunggah<br>Mohon coba file lain');
                }
            });
            this.on('addedfile', function(file) {
                var file_type;
                switch (file.type) {
                    case 'application/pdf':
                    file_type = 'pdf';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/doc':
                    case 'application/msword':
                    file_type = 'doc';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/docx':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    file_type = 'docx';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/vnd.ms-excel':
                    file_type = 'csv';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                    file_type = 'xlsx';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case '.csv':
                    file_type = 'csv';
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'image/jpeg':
                    case 'image/jpg':
                    file_type = 'jpg';
                    break;
                    case 'image/png':
                    file_type = 'png';
                    break;
                }
                $('.upload-file-'+foldername).val(filename+'.'+file_type);
                $('.upload-file-'+foldername).addClass('valid');
                $('.upload-file-'+foldername).removeClass('is-invalid');
            });
            this.on('removedfile', function(file){
                var file_type;
                switch (file.type) {
                    case 'application/pdf':
                    file_type = 'pdf';
                    break;
                    case 'application/doc':
                    case 'application/msword':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    file_type = 'doc';
                    break;
                    case 'application/docx':
                    file_type = 'docx';
                    break;
                    case 'application/vnd.ms-excel':
                    file_type = 'xls';
                    break;
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                    file_type = 'xlsx';
                    break;
                    case '.csv':
                    file_type = 'csv';
                    break;
                    case 'image/jpeg':
                    case 'image/jpg':
                    file_type = 'jpg';
                    break;
                    case 'image/png':
                    file_type = 'png';
                    break;
                }
                $('.preview-file-'+foldername).html('');                
                $('.upload-file-'+foldername).siblings('.invalid-feedback').html('File wajib diunggah');
                $('.upload-file-'+foldername).val('');
                $('.upload-file-'+foldername).addClass('is-invalid');
                $('.upload-file-'+foldername).removeClass('valid');
                $.ajax({
                    url: base_url+'temporary/removefiletemp',
                    type: 'POST',
                    data: {
                        'file': filename+'.'+file_type,
                        'type': foldername,
                        'foldercode': foldercode,
                        'id_user': iduser,
                    }
                });
            });
            if(fileupload != '')
            {
                mockFile = {name: fileupload, accepted: true};
                this.emit('addedfile', mockFile);
                if(accept == 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf')
                {
                    var extension = fileupload.substr(fileupload.lastIndexOf(".") + 1);
                    if(extension == 'doc' || extension == 'docx')
                    {
                        this.emit('thumbnail', mockFile,base_url+'img/icon/doc.png');
                    }
                    else
                    {
                        this.emit('thumbnail', mockFile,base_url+'img/icon/pdf.png');
                    }
                }
                else
                {
                    this.emit('thumbnail', mockFile,base_url+'assets/'+foldername+'/'+foldercode+'/'+fileupload);
                }
                this.emit('complete', mockFile);
                $(this.element).find('.dz-size').remove();
                this.files.push(mockFile);
            }
        },
    });
});