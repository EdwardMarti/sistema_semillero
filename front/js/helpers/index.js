headers = () => ({
    Accept: "application/json",
    "Content-Type": "application/json",
    Plataform: "web",
});
options = (method, data) => ({
    method: method,
    body: JSON.stringify(data),
    headers: headers(),
});

PUT = (data) => (options("PUT", data));
DELETE = (data) => (options("DELETE", data));
POST = (data) => (options("POST", data));
GET = () => ({method: "GET", headers: headers(),});

VAL = (id) => (document.getElementById(id).value);
IS_CHECKED = (id) => (document.getElementById(id).checked);
SELECTED_ITEM = (id) => ({
    value: VAL(id),
    text: document.getElementById(id).options[document.getElementById(id).selectedIndex].text,
})

buildSelect = (idSelect, data) => {
    $(`#${idSelect}`).empty();
    let input = $(`#${idSelect}`);
    for (let i in data) {
        let opcion = new Option(data[i].name, data[i].id);
        $(opcion).html(data[i].name);
        input.append(opcion);
    }
}