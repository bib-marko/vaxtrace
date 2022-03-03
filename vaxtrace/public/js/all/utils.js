//===========================================================================
// global functions

// logging data
function log(data) {
    return console.log(data);
}

/**
 * VALIDATE INPUT FIELD
 * @param {*} input
 * @returns
 */
function isNotEmpty(input) {
    if (input.val() == "") {
        input.addClass("is-invalid");
        return false;
    } else {
        input.removeClass("is-invalid");
        return true;
    }
}
/** END Validation FUNCTION */

// print  0 or 1 to truthy value ( True or False)
function isBool(data) {
    if (data === 0) {
        return `<span class='badge default_bg2 text-white p-2'>No</span>`;
    } else {
        return `<span class='badge default_bg text-white p-2'>Yes</span>`;
    }
}

function isBoosted(data) {
    if (data == 0) {
        return `<span class='badge bg-light-info p-2 text-uppercase'>Pending</span>`;
    } else if (data == 1) {
        return `<span class='badge bg-light-success p-2 text-uppercase'>Boosted</span>`;
    } else {
        return `<span class='badge bg-light-danger p-2 text-uppercase'>Declined</span>`;
    }
}

// print  0 or 1 to (Pending, Approved , Decline)
function isApproved(data) {
    if (data === 0) {
        return `<span class='badge bg-light-info p-2 text-uppercase'>Pending</span>`;
    } else if (data === 1) {
        return `<span class='badge bg-light-success text-white p-2 text-uppercase'>Approved</span>`;
    } else {
        return `<span class='badge bg-light-danger p-2 text-uppercase'>Declined</span>`;
    }
}

// print  0 or 1 to (Pending, Available , Expired)
function isExpired(data) {
    if (data === 0) {
        return `<span class='badge bg-light-info p-2 text-uppercase'>Pending</span>`;
    } else if (data === 1) {
        return `<span class='badge bg-light-success text-white p-2 text-uppercase'>No</span>`;
    } else {
        return `<span class='badge bg-light-danger p-2 text-uppercase'>Yes</span>`;
    }
}

function handleNullImage(img, folder_path) {
    if (img) {
        return `<img id='show_img' class='img-thumbnail' src='${folder_path}/${img}' width='75'>`;
    } else {
        return `<img class='img-thumbnail' src='/img/noimg.png' width='75'>`;
    }
}

function handleTransactionType(data) {
    if (data == "App\\Models\\FlashCabarter") {
        return "Flash Cabarter";
    } else if (data == "App\\Models\\Ad") {
        return "Ads";
    } else if (data == "App\\Models\\Post") {
        return "Boost Post";
    } else if (data == "App\\Models\\Subscription") {
        return "Subscription";
    }
}

function handleNullField(field) {
    return field ?? "";
}

function display_subscription_type(type) {
    if (type === 0) {
        return `<span class='badge bg-secondary p-2'>Free Account</span>`;
    } else if (type === 1) {
        return `<span class='badge bg-warning p-2'>Pro Account</span>`;
    } else {
        return `<span class='badge bg-warning p-2'>Premium Account</span>`;
    }
}

function formatDate(date, opt) {
    if (date) {
        if (opt == "full") {
            const formatted_date = new Date(date);
            return formatted_date.toLocaleDateString();
        }
        if (opt == "date_time") {
            const formatted_date = new Date(date);
            return formatted_date.toLocaleDateString();
        }
    } else {
        return ``;
    }
}

function handleAvailabilty(data) {
    if (data == "available") {
        return `<span class='text-success text-capitalize'> ${data} <i class="far fa-check-circle"></i> </span>`;
    } else {
        return `<span class='text-danger text-capitalize'> ${data} <i class="far fa-times-circle"></i> </span>`;
    }
}

function success(msg) {
    Swal.fire({
        icon: "success",
        title: `${msg}`,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
}

function error(msg) {
    Swal.fire({
        icon: "error",
        title: `${msg}`,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
}

function confirm() {
    return Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => result);
}

// show image
$(document).on("click", "#show_img", function () {
    let image = $(this).attr("src");
    Swal.fire({
        title: "",
        imageWidth: "100%",
        imageHeight: "100%",
        padding: "3em",
        imageUrl: `${image}`,
        backdrop: `
          rgba(0,0,123,0.4)
          left top
          no-repeat
        `,
    });
});

// User

function handleNullAvatar(img) {
    if (img) {
        return img;
    } else {
        return `/img/noimg.svg`;
    }
}

function offer_accepted_greetings() {
    $("#m_offered_greetings").modal("show");
}

function addFlashCabarterDisccount(value) {
    return Math.round(value - value * 0.2);
}

function greetings(message) {
    Swal.fire({
        title: `${message.title}`,
        text: `${message.description}`,
        imageUrl: window.location.origin + "/img/assets/adminchecking.svg",
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: "Problem Solved",
        showConfirmButton: false,
    });
}

function termsAndCondtions() {
    $("#m_terms").modal("show");
}
function userWithValidID() {
    $("#m_id").modal("show");
}
