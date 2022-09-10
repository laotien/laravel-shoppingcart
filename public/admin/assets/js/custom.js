let removeBtns = document.getElementsByClassName("remove-item-btn");
let checkAll = document.getElementById("checkAll");

// Check box all
if (checkAll) {
    checkAll.onclick = function () {
        let checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');

        if (checkAll.checked === true) {
            Array.from(checkboxes).forEach(function (checkbox) {
                checkbox.checked = true;
                checkbox.closest("tr").classList.add("table-active");
            });
        } else {
            Array.from(checkboxes).forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.closest("tr").classList.remove("table-active");
            });
        }
    };
}

function deleteMultiple() {
    const btn = document.querySelector('.btn-soft-danger');
    const url = btn.dataset.deleteUrl;
    const ids_array = [];
    let items = document.getElementsByName('chk_child');

    // get trNode and id
    Array.from(items).forEach(function (ele) {
        if (ele.checked === true) {
            let trNode = ele.parentNode.parentNode.parentNode;
            let id = trNode.querySelector('.form-check-input').value;
            ids_array.push(id); // push all id
        }
    });

    if (typeof ids_array !== 'undefined' && ids_array.length > 0) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: "Yes, delete it!",
            buttonsStyling: false,
            showCloseButton: true
        }).then(function (result) {
            if (result.isConfirmed) {
                axios.post(url, {ids: ids_array}).then(function (response) {
                    document.querySelectorAll('.form-check-input:checked').forEach(e => {
                        e.parentNode.parentNode.parentNode.remove()
                    });
                    document.getElementById('checkAll').checked = false;
                    deletedSuccessfully()
                })

            } else {
                return false;
            }
        });
    } else {
        Swal.fire({
            title: 'Please select at least one checkbox',
            confirmButtonClass: 'btn btn-info',
            buttonsStyling: false,
            showCloseButton: true
        });
    }

}

// Axios Delete
Array.from(removeBtns).forEach(function (btn) {
    btn.addEventListener("click", function (e) {
        const url = btn.dataset.url;
        document.getElementById("delete-record").addEventListener("click", function () {
            axios.get(url)
                .then(function (response) {
                    e.target.closest("tr").remove();
                    document.getElementById("deleteRecordModal").click();
                    deletedSuccessfully()
                })
        });
    })
})

function deletedSuccessfully() {
    Swal.fire({
        title: 'Deleted!',
        text: 'Your data has been deleted.',
        icon: 'success',
        confirmButtonClass: 'btn btn-info',
        buttonsStyling: false,
        showCloseButton: true
    });
}








