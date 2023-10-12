$(function () {
    // ClassicEditor
    //     .create(document.querySelector('#contents'), {
    //         toolbar: {
    //             items: [
    //                 'MathType',
    //                 'CKFinder', "|",
    //                 'heading',
    //                 'bold',
    //                 'link',
    //                 'italic',
    //                 '|',
    //                 'blockQuote',
    //                 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
    //                 'insertTable',
    //                 'undo',
    //                 'redo',
    //                 'uploadImage',
    //                 'bulletedList',
    //                 'numberedList',
    //                 'mediaEmbed',
    //                 'fontBackgroundColor',
    //                 'fontColor',
    //                 'fontSize',
    //                 'fontFamily',
    //             ]
    //         },
    //         language: 'vi',
    //         image: {
    //             toolbar: [
    //                 'imageTextAlternative',
    //                 'imageStyle:full',
    //                 'imageStyle:side'
    //             ]
    //         },
    //         // table: {
    //         // 	 contentToolbar: [
    //         // 		'tableColumn', 'tableRow', 'mergeTableCells',
    //         // 		'tableProperties', 'tableCellProperties'
    //         // 	],

    //         // 	// Set the palettes for tables.
    //         // 	tableProperties: {
    //         // 		borderColors: customColorPalette,
    //         // 		backgroundColors: customColorPalette
    //         // 	},

    //         // 	// Set the palettes for table cells.
    //         // 	tableCellProperties: {
    //         // 		borderColors: customColorPalette,
    //         // 		backgroundColors: customColorPalette
    //         // 	}
    //         // },
    //         licenseKey: '',


    //     })
    //     .then(editor => {
    //         window.editor = editor;

    //     })
    //     .catch(error => {
    //         // console.error('Oops, something went wrong!');
    //         // console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
    //         // console.warn('Build id: v10wxmoi2tig-mwzdvmyjd96s');
    //         console.error(error);
    //     });

    // ClassicEditor
    //     .create(document.querySelector('#short_content'), {
    //         toolbar: {
    //             items: [
    //                 'MathType',
    //                 'CKFinder', "|",
    //                 'heading',
    //                 'bold',
    //                 'link',
    //                 'italic',
    //                 '|',
    //                 'blockQuote',
    //                 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
    //                 'insertTable',
    //                 'undo',
    //                 'redo',
    //                 'uploadImage',
    //                 'bulletedList',
    //                 'numberedList',
    //                 'mediaEmbed',
    //                 'fontBackgroundColor',
    //                 'fontColor',
    //                 'fontSize',
    //                 'fontFamily',
    //             ]
    //         },
    //         language: 'vi',
    //         image: {
    //             toolbar: [
    //                 'imageTextAlternative',
    //                 'imageStyle:full',
    //                 'imageStyle:side'
    //             ]
    //         },
    //         // table: {
    //         // 	 contentToolbar: [
    //         // 		'tableColumn', 'tableRow', 'mergeTableCells',
    //         // 		'tableProperties', 'tableCellProperties'
    //         // 	],

    //         // 	// Set the palettes for tables.
    //         // 	tableProperties: {
    //         // 		borderColors: customColorPalette,
    //         // 		backgroundColors: customColorPalette
    //         // 	},

    //         // 	// Set the palettes for table cells.
    //         // 	tableCellProperties: {
    //         // 		borderColors: customColorPalette,
    //         // 		backgroundColors: customColorPalette
    //         // 	}
    //         // },
    //         licenseKey: '',


    //     })
    //     .then(editor => {
    //         window.editor = editor;
    //     })
    //     .catch(error => {
    //         console.error('Oops, something went wrong!');
    //         console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
    //         console.warn('Build id: v10wxmoi2tig-mwzdvmyjd96s');
    //         console.error(error);
    //     });

    document.querySelectorAll('.ck-form').forEach(function (val) {
        ClassicEditor
        .create(val, {
            toolbar: {
                items: [
                    'MathType',
                    'CKFinder', "|",
                    'heading',
                    'bold',
                    'link',
                    'italic',
                    '|',
                    'blockQuote',
                    'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
                    'insertTable',
                    'undo',
                    'redo',
                    'uploadImage',
                    'bulletedList',
                    'numberedList',
                    'mediaEmbed',
                    'fontBackgroundColor',
                    'fontColor',
                    'fontSize',
                    'fontFamily',
                ]
            },
            language: 'vi',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            // table: {
            // 	 contentToolbar: [
            // 		'tableColumn', 'tableRow', 'mergeTableCells',
            // 		'tableProperties', 'tableCellProperties'
            // 	],

            // 	// Set the palettes for tables.
            // 	tableProperties: {
            // 		borderColors: customColorPalette,
            // 		backgroundColors: customColorPalette
            // 	},

            // 	// Set the palettes for table cells.
            // 	tableCellProperties: {
            // 		borderColors: customColorPalette,
            // 		backgroundColors: customColorPalette
            // 	}
            // },
            licenseKey: '',


        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: v10wxmoi2tig-mwzdvmyjd96s');
            console.error(error);
        });
    }); // -------------


});

