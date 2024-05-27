document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('projectForm');
    const projectsTable = document.getElementById('projectsTable').getElementsByTagName('tbody')[0];
    let editMode = false;
    let currentProjectId = null;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        const url = editMode ? 'update_project.php' : 'add_project.php';

        if (editMode) {
            formData.append('id', currentProjectId);
        }

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(handleFormResponse);
    });

    function handleFormResponse(data) {
        if (data.success) {
            loadProjects();
            form.reset();
            editMode = false;
            currentProjectId = null;
        } else {
            alert('Error submitting project.');
        }
    }

    function loadProjects() {
        fetch('get_projects.php')
            .then(response => response.json())
            .then(displayProjects);
    }

    function displayProjects(data) {
        projectsTable.innerHTML = '';
        data.projects.forEach(project => {
            const row = projectsTable.insertRow();
            row.insertCell(0).innerText = project.student_name;
            row.insertCell(1).innerText = project.student_roll_no;
            row.insertCell(2).innerText = project.section;
            row.insertCell(3).innerText = project.course;
            row.insertCell(4).innerText = project.project_type;
            row.insertCell(5).innerText = project.project_details;
            row.insertCell(6).innerText = project.remarks;
            const actionsCell = row.insertCell(7);
            actionsCell.innerHTML = `
                <button onclick="deleteProject(${project.id})">Delete</button>
                <button onclick="editProject(${project.id})">Edit</button>
            `;
        });
    }

    window.deleteProject = function (id) {
        fetch('delete_project.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(handleDeleteResponse);
    };

    function handleDeleteResponse(data) {
        if (data.success) {
            loadProjects();
        } else {
            alert('Error deleting project.');
        }
    }

    window.editProject = function (id) {
        fetch(`get_project.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                populateForm(data.project);
                editMode = true;
                currentProjectId = id;
            });
    };

    function populateForm(project) {
        form.student_name.value = project.student_name;
        form.student_roll_no.value = project.student_roll_no;
        form.section.value = project.section;
        form.course.value = project.course;
        form.project_type.value = project.project_type;
        form.project_details.value = project.project_details;
        form.remarks.value = project.remarks;
    }
    loadProjects();
});
