// Membuat event listener untuk input, jadi bisa memfungsikan tombol enter
const taskInput = document.getElementById("task");
taskInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        addTask();
    }
});

function addTask() {
    const taskInput = document.getElementById("task");
    const taskText = taskInput.value.trim();
    if (taskText === "") return;

    const taskList = document.getElementById("taskList");
    const newTask = document.createElement("li");
    newTask.innerText = taskText;

    // Tambahkan tombol hapus
    const deleteButton = document.createElement("button");
    deleteButton.innerText = "Hapus";
    deleteButton.addEventListener("click", function () {
        taskList.removeChild(newTask);
    });

    newTask.appendChild(deleteButton);
    taskList.appendChild(newTask);

    taskInput.value = ""; // Bersihkan input setelah menambahkan tugas
}
