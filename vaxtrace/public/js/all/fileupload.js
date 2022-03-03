// Shared File Pond Instance

const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;

// Get a reference to the file input element
const image = document.querySelector("#user_image");
// Create a FilePond instance
const pond = FilePond.create(image, {
    storeAsFile: true,
    server: {
        url: `${baseUrl}/tmp_upload`,
        headers: {
            "X-CSRF-TOKEN": `${token}`,
        },
        revert: "/revert",
    },
});

// ===================================================

// Admin File Pond Instance

//================================
// Auth User

// FOR Post TMP FILE UPLOAD

// Get a reference to the file input element
const p_image = document.querySelector("#p_image");
// Create a FilePond instance
const u_pond = FilePond.create(p_image, {
    storeAsFile: true,
    server: {
        url: `${baseUrl}/tmp_upload`,
        headers: {
            "X-CSRF-TOKEN": `${token}`,
        },
        revert: "/revert",
    },
});
