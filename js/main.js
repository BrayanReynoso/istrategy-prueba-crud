// Constants
const API_ENDPOINTS = {
    READ_USERS: './../../users/read.php',
    LOGIN: '../../users/login_process.php',
    ADD_USER: '../../users/agregar_usuario.php',
    READ_SINGLE_USER: '../../users/read_single.php',
    DELETE_USER: '../../users/eliminar_usuario.php',
    LOGOUT: '/prueba-istrategy/users/logout.php'
};

// Utility functions
const showAlert = (message, type) => {
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = '';

    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    `;

    alertContainer.appendChild(alertDiv);

    if (type !== 'info') {
        setTimeout(() => alertDiv.classList.remove('show'), 2000);
    }
};

// Utility function for AJAX requests
const ajaxRequest = (url, options) => {
    return $.ajax({
        url,
        ...options,
        error: (xhr, status, error) => {
            console.error('Error en la solicitud AJAX:', error);
            throw error;
        }
    });
};

// User management functions
const fetchUsers = () => {
    const loader = document.getElementById('loader');
    loader.style.display = 'flex';

    ajaxRequest(API_ENDPOINTS.READ_USERS, { type: 'GET' })
        .done(data => {
            const tbody = document.querySelector('#usersTable tbody');
            tbody.innerHTML = '';

            if (data.error) {
                console.error('Error de consulta:', data.error);
                tbody.innerHTML = '<tr><td colspan="6">Error al obtener los datos</td></tr>';
            } else {
                data.forEach((user, index) => {
                    const genderText = user.gender === 'female' ? 'Mujer' : (user.gender === 'male' ? 'Hombre' : 'No Encontrado');
                    const row = `
                        <tr>
                            <td>${index + 1}</td> <!-- Índice en lugar de ID -->
                            <td>${user.username || 'No Encontrado'}</td>
                            <td>${user.email || 'No Encontrado'}</td>
                            <td>${genderText}</td>
                            <td>${user.created_at || 'No Encontrado'}</td>
                            <td>
                                <a href="editForm.php?id=${user.id}" class="btn btn-warning btn-sm">Editar</a>
                                <button onclick="deleteUser(${user.id})" class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
                $('#usersTable').DataTable();
            }
        })
        .fail(error => {
            console.error('Error al obtener los datos:', error);
            const tbody = document.querySelector('#usersTable tbody');
            tbody.innerHTML = '<tr><td colspan="6">Error al obtener los datos</td></tr>';
        })
        .always(() => {
            setTimeout(() => {
                loader.style.display = 'none';
            }, 2000);
        });
};

const addUser = (formData) => {
    return ajaxRequest(API_ENDPOINTS.ADD_USER, {
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false
    })
    .done(data => {
        if (data.status === 'success') {
            showAlert('Usuario añadido exitosamente.', 'success');
            setTimeout(() => {
                window.location.href = '/prueba-istrategy/public/pages/home.php';
            }, 1000);
            return true;
        } else {
            showAlert('Error al añadir el usuario: ' + data.message, 'danger');
            return false;
        }
    })
    .fail(() => {
        showAlert('Ocurrió un error al procesar la solicitud.', 'danger');
        return false;
    });
};

const editUser = (userId) => {
    showAlert('Cargando datos del usuario...', 'info');  // Mensaje inicial de carga

    ajaxRequest(`${API_ENDPOINTS.READ_SINGLE_USER}?id=${userId}`, { type: 'GET' })
        .done(data => {
            if (data.error) {
                showAlert(data.error, 'danger');  // Mostrar error si existe
                return;  // Salir de la función si hay error
            }   
            console.log(data)
            // Rellenar los campos del formulario con los datos del usuario
            document.getElementById('editUserId').value = data.id || '';  // Asegúrate de tener un campo para userId
            document.getElementById('editUsername').value = data.username || '';
            document.getElementById('editEmail').value = data.email || '';
            document.getElementById('editGender').value = data.gender || '';
            document.getElementById('editCreatedAt').value = data.created_at || '';

            showAlert('Datos del usuario cargados exitosamente.', 'success');  // Mostrar éxito

        })
        .fail(() => {
            showAlert('Error al obtener los datos del usuario.', 'danger');  // Mostrar error en caso de fallo
        });
};

let userIdToDelete = null;

const deleteUser = (userId) => {
    userIdToDelete = userId;
    $('#confirmModal').modal('show');
};

const confirmDeleteUser = () => {
    if (userIdToDelete === null) return;

    ajaxRequest(`${API_ENDPOINTS.DELETE_USER}?id=${userIdToDelete}`, {
        type: 'DELETE',
        contentType: 'application/json'
    })
    .done(data => {
        if (data.status === 'success') {
            showAlert('Usuario eliminado exitosamente.', 'success');
            setTimeout(() => {
                window.location.href = '/prueba-istrategy/public/pages/home.php';
            }, 500);
        } else {
            showAlert('Error al eliminar el usuario: ' + data.message, 'danger');
        }
    })
    .fail(error => {
        console.error('Error en la solicitud:', error);
        showAlert('Error al eliminar el usuario.', 'danger');
    })
    .always(() => {
        $('#confirmModal').modal('hide');
        userIdToDelete = null;
    });
};

$(document).ready(() => {
    try {
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            $(loginForm).on('submit', (e) => {
                e.preventDefault();
                const formData = new FormData(loginForm);
                ajaxRequest(API_ENDPOINTS.LOGIN, {
                    type: 'POST',
                    data: new URLSearchParams(formData),
                    contentType: 'application/x-www-form-urlencoded'
                })
                .done(() => {
                    // Handle successful login (e.g., redirect)
                })
                .fail(() => {
                    showAlert('Ocurrió un error al procesar la solicitud.', 'danger');
                });
            });
        }
    } catch (error) {
        showAlert('Ocurrió un error al procesar la solicitud.', 'danger');
    }

    const userForm = document.getElementById('userForm');
    if (userForm) {
        $(userForm).on('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(userForm);
            addUser(formData).then(success => {
                if (success) userForm.reset();
            });
        });
    }

    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id');
    if (userId) {
        editUser(userId);
    }

    const confirmDeleteButton = document.getElementById('confirmDeleteButton');
    if (confirmDeleteButton) {
        $(confirmDeleteButton).on('click', confirmDeleteUser);
    }

    const logoutButton = document.getElementById('logoutButton');
    if (logoutButton) {
        $(logoutButton).on('click', (e) => {
            e.preventDefault();
            if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
                ajaxRequest(API_ENDPOINTS.LOGOUT, { type: 'GET' })
                .done(() => {
                    window.location.href = '/prueba-istrategy/public/pages/login.php';
                })
                .fail(() => {
                    alert('Error al cerrar sesión');
                });
            }
        });
    }
    fetchUsers();
});