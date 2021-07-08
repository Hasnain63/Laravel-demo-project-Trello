function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(target, ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var dest = target.querySelector(".box-body");


    console.log(data)
    console.log(dest)
    if (document.getElementById(data).className == "box") {
        if (target.className == "column") {
            var dest = target;
        }
        if (target.className == "card") {
            var dest = target.parentNode;
        }

        if (Array.prototype.indexOf.call(document.getElementById(data).parentNode.parentNode.children, document.getElementById(data).parentNode) > Array.prototype.indexOf.call(dest.parentNode.children, dest)) {
            insertBefore(document.getElementById(data).parentNode, dest);
        } else {
            insertAfter(document.getElementById(data).parentNode, dest);
        }

    }

    if (document.getElementById(data).className == "card") {
        if (ev.target.className != "card") {
            var up = ev.target.parentNode.getAttribute('id');
        } else {
            var up = ev.target.getAttribute('id');
        }

        if (up == null || ev.target.className == "box" || ev.target.className == "box-footer" || ev.target.className == "box-header" || ev.target.className == "column") {
            dest.appendChild(document.getElementById(data));
        } else if (document.getElementById(up).className == "card") {
            if (Array.prototype.indexOf.call(document.getElementById(data).parentNode.children, document.getElementById(data)) > Array.prototype.indexOf.call(document.getElementById(up).parentNode.children, document.getElementById(up))) {
                insertBefore(document.getElementById(data), document.getElementById(up));
            } else {
                insertAfter(document.getElementById(data), document.getElementById(up));
            }
        }

    }

}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function insertBefore(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode);
}