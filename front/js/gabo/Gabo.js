class Gabo {
    constructor(tag) {
        this.tag = tag;
        this.id = null;
        this.class = null;
        this.textNode = null;
        this.style = null;
        this.value = null;

        this.contenteditable = null;
        this.dataToggle = null;
        this.dataPlacement = null;
        this.dataParent = null;
        this.href = null;
        this.ariaExpanded = null;
        this.title = null;

        this.onClick = null;
        this.onChange = null;
        this.onkeydown = null;
        this.onkeyup = null;
    }

    setId(id) {
        this.id = id;
        return this;
    }

    setClass(clase) {
        this.class = clase;
        return this;
    }

    setTextNode(textNode) {
        this.textNode = textNode;
        return this;
    }

    setStyle(style) {
        this.style = style;
        return this;
    }

    setValue(value) {
        this.value = value;
        return this;
    }

    setContentEditable(contenteditable) {
        this.contenteditable = contenteditable;
        return this;
    }

    setDataToggle(dataToggle) {
        this.dataToggle = dataToggle;
        return this;
    }

    setDataPlacement(dataPlacement) {
        this.dataPlacement = dataPlacement;
        return this;
    }

    setDataParent(dataParent) {
        this.dataParent = dataParent;
        return this;
    }

    setHref(href) {
        this.href = href;
        return this;
    }


    setAriaExpanded(ariaExpanded) {
        this.ariaExpanded = ariaExpanded;
        return this;
    }

    setOnClick(onclick) {
        this.onClick = onclick;
        return this;
    }

    setOnChange(onchange) {
        this.onChange = onchange;
        return this;
    }

    setOnKeyDown(onkeydown) {
        this.onkeydown = onkeydown;
        return this;
    }

    setOnKeyUp(onkeyup) {
        this.onkeyup = onkeyup;
        return this;
    }

    setTitle(title) {
        this.title = title;
        return this;
    }


    build() {
        let element = document.createElement(this.tag);
        return this.setParameters(element);
    }

    setParameters(element) {
        if (this.id != null) {
            element.setAttribute("id", this.id);
        }

        if (this.class != null) {
            element.setAttribute("class", this.class);
        }

        if (this.textNode != null) {
            element.appendChild(document.createTextNode(this.textNode));
        }

        if (this.contenteditable != null) {
            element.setAttribute("contenteditable", this.contenteditable);
        }

        if (this.dataToggle != null) {
            element.setAttribute("data-toggle", this.dataToggle);
        }

        if (this.dataParent != null) {
            element.setAttribute("data-parent", this.dataParent);
        }

        if (this.href != null) {
            element.setAttribute("href", this.href);
        }

        if (this.ariaExpanded != null) {
            element.setAttribute("aria-expanded", this.ariaExpanded);
        }

        if (this.onClick != null) {
            element.setAttribute("onclick", this.onClick);
        }

        if (this.onChange != null) {
            element.setAttribute("onchange", this.onChange);
        }

        if (this.onkeydown != null) {
            element.setAttribute("onkeydown", this.onkeydown);
        }

        if (this.onkeyup != null) {
            element.setAttribute("onkeyup", this.onkeyup);
        }

        if (this.style != null) {
            element.setAttribute("style", this.style);
        }

        if (this.dataPlacement != null) {
            element.setAttribute("data-placement", this.dataPlacement);
        }

        if (this.title != null) {
            element.setAttribute("title", this.title);
        }

        if (this.value != null) {
            element.setAttribute("value", this.value);
        }

        return element;
    }

}