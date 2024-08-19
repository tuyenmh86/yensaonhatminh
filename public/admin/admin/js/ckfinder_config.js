function openPopup() {
    CKFinder.popup( {
        // Configure CKFinder's popup size.
        width: 800,
        height: 500,
        // Enable file choose mechanism.
        chooseFiles: true,

        selectMultiple: true,
        // Restrict user to choose only from Images resource type.
        resourceType: 'Images',
        // Add handler for events that are fired when user select's file.
        onInit: function( finder ) {
            // User selects original image.
            finder.on( 'files:choose', function( evt ) {
                // Get first file because user might select multiple files
                var file = evt.data.files.first();
                showUploadedImage( file.getUrl() )
            } );

            // User selects resized image.
            finder.on( 'file:choose:resizedImage', function( evt ) {
                showUploadedImage( evt.data.resizedUrl );
            } );
        }
    } );
}

function showUploadedImage( url ) {
    // Update field's value
    jQuery( '#image_file' ).val( url );
    jQuery( '#img_edit_show' ).hide();
    // Show chosen image
    var img = jQuery( '<img width="100%">' ).attr( 'src', url );
    jQuery( '#side-feature-img' ).html( img );
}

// ********************************* PAGE TWO INPUT FILE *********************************
function openPopup_2() {
    CKFinder.popup( {
        // Configure CKFinder's popup size.
        width: 800,
        height: 500,
        // Enable file choose mechanism.
        chooseFiles: true,
        // Restrict user to choose only from Images resource type.
        resourceType: 'Images',
        // Add handler for events that are fired when user select's file.
        onInit: function( finder ) {
            // User selects original image.
            finder.on( 'files:choose', function( evt ) {
                // Get first file because user might select multiple files
                var file = evt.data.files.first();
                showUploadedImage_2( file.getUrl() )
            } );

            // User selects resized image.
            finder.on( 'file:choose:resizedImage', function( evt ) {
                showUploadedImage_2( evt.data.resizedUrl );
            } );
        }
    } );
}

function showUploadedImage_2( url ) {
    // Update field's value
    jQuery( '#image_file_2' ).val( url );
    jQuery( '#img_edit_show_2' ).hide();
    // Show chosen image
    var img = jQuery( '<img width="100%">' ).attr( 'src', url );
    jQuery( '#side-feature-img-2' ).html( img );
}

// ***************************** MULTIPLE SELECT FILE *******************
function openPopupMultiple() {
    CKFinder.popup( {
        // Configure CKFinder's popup size.
        width: 800,
        height: 500,
        // Enable file choose mechanism.
        chooseFiles: true,
        // Restrict user to choose only from Images resource type.
        resourceType: 'Images',
        // Add handler for events that are fired when user select's file.
        onInit: function( finder ) {
            // finder.on('files:keypress',function(){
            // User selects original image.
                finder.on( 'files:choose', function( evt ) {
                    var files = evt.data.files;

                    var chosenFiles = '';

                    files.forEach( function( file, i ) {
                        chosenFiles += ( '|' ) + file.getUrl()+ '\n';
                    } );
                    // alert(chosenFiles);
                    console.log(chosenFiles);

                    showUploadedImageMultiple( chosenFiles);
                } );

                // User selects resized image.
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    showUploadedImageMultiple( evt.data.resizedUrl );
                } );
        }

    } );
}

function showUploadedImageMultiple( url ) {
    // Update field's value
    jQuery( '#image_file_multiple' ).val( url );

    jQuery( '#img_edit_show_multiple' ).hide();
    // Show chosen image
    var img_list = url.split('|');
    // var img = jQuery( '<img width="100%">' ).attr( 'src', url );
    for (var i = 1; i < img_list.length; i++) {
        var img = jQuery( '<img width="33%">' ).attr( 'src', img_list[i] );
        jQuery( '.side-feature-img-multiple' ).append( img );
    }
}

// *************************** MULTIPLE SELECT FILE FLOOR PLAN *******************
function openPopupMultipleFl() {
    CKFinder.popup( {
        // Configure CKFinder's popup size.
        width: 800,
        height: 500,
        // Enable file choose mechanism.
        chooseFiles: true,
        // Restrict user to choose only from Images resource type.
        resourceType: 'Images',
        // Add handler for events that are fired when user select's file.
        onInit: function( finder ) {
            // finder.on('files:keypress',function(){
            // User selects original image.
                finder.on( 'files:choose', function( evt ) {
                    var files = evt.data.files;

                    var chosenFiles = '';

                    files.forEach( function( file, i ) {
                        chosenFiles += ( '|' ) + file.getUrl()+ '\n';
                    } );
                    // alert(chosenFiles);
                    console.log(chosenFiles);

                    showUploadedImageMultipleFl( chosenFiles);
                } );

                // User selects resized image.
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    showUploadedImageMultipleFl( evt.data.resizedUrl );
                } );
        }

    } );
}

function showUploadedImageMultipleFl( url ) {
    // Update field's value
    jQuery( '#fl_image_file_multiple' ).val( url );

    jQuery( '#fl_img_edit_show_multiple' ).hide();
    // Show chosen image
    var img_list = url.split('|');
    // var img = jQuery( '<img width="100%">' ).attr( 'src', url );
    for (var i = 1; i < img_list.length; i++) {
        var img = jQuery( '<img width="33%">' ).attr( 'src', img_list[i] );
        jQuery( '.fl-side-feature-img-multiple' ).append( img );
    }
}