class BreakdanceDesignLibrary {
  elements = [];
  treeNodes = [];

  constructor() {
    this.addCopyButton = this.addCopyButton.bind(this);
    this.bindListeners();
  }

  isDesignLibraryRequest() {
    const params = new URLSearchParams(window.location.search);
    return params.get("breakdance") === "design-library";
  }

  isLinkPreviewable(element) {
    if ("javascript:" === element.protocol) return true;

    // Only web URLs can be previewed.
    if ("https:" !== element.protocol && "http:" !== element.protocol) {
      return false;
    }

    const matchesAllowedUrl = location.host === element.host;

    if ( ! matchesAllowedUrl ) {
      return false;
    }

    // Skip wp login and signup pages.
    if ( /\/wp-(login|signup)\.php$/.test( element.pathname ) ) {
      return false;
    }

    // Disallow links to admin, includes, and content.
    if ( /\/wp-(admin|includes|content)(\/|$)/.test( element.pathname ) ) {
      return false;
    }

    return true;
  }

  // Cross-domain iframe event dispatcher
  dispatch(name, detail) {
    window.parent.postMessage(`${name},${JSON.stringify(detail)}`, "*");
  }

  bindListeners() {
    window.addEventListener("beforeunload", () => {
      this.dispatch("breakdanceBeforeLeave");
    });

    document.addEventListener("DOMContentLoaded", () => {
      this.init();
    });
  }

  maybePreparePageForIframeRequest() {
    if (!this.isDesignLibraryRequest()) return;

    const links = [...document.querySelectorAll("a")];
    const internalLinks = links.filter(this.isLinkPreviewable);
    const externalLinks = links.filter((link) => !this.isLinkPreviewable(link));

    internalLinks.forEach((link) => {
      let params = new URLSearchParams(link.search);
      params.set("breakdance", "design-library");
      link.search = params;
    });

    externalLinks.forEach((link) => {
      link.classList.add("is-external-link");
      link.addEventListener("click", (event) => event.preventDefault());
    });
  }

  copyTextToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    let successful;

    try {
      successful = document.execCommand("copy");
    } catch (err) {
      console.error("Unable to copy", err);
      successful = false;
    }

    document.body.removeChild(textArea);

    return successful;
  }

  onCopyClick(event, elementAsJson) {
    event.preventDefault();

    const source = location.hostname;
    const element = JSON.parse(elementAsJson);
    const colors = [];
    const presets = [];

    const text = JSON.stringify({ source, element, colors, presets });
    let successful;

    if (this.isDesignLibraryRequest()) {
      this.dispatch("breakdanceImportElement", element);
      successful = true;
    } else {
      successful = this.copyTextToClipboard(text);
    }

    if (successful) {
      event.target.classList.add("bd-copy-button--success");

      setTimeout(() => {
        event.target.classList.remove("bd-copy-button--success");
      }, 1000);
    }
  }

  createCopyButton() {
    const btn = document.createElement("button");
    btn.classList.add("bd-copy-button");

    if (this.isDesignLibraryRequest()) {
      const text = document.createTextNode("Add to page");
      btn.appendChild(text);
      btn.classList.add("bd-copy-button--import");
    } else {
      const text = document.createTextNode("Copy to clipboard");
      btn.appendChild(text);
    }

    return btn;
  }

  onMouseEnter(element, btn) {
    const rect = btn.getBoundingClientRect();
    const topMostElement = document.elementsFromPoint(rect.x, rect.y)
      .filter((el) => !!el.matches("header, section"))
      .at(0);

    if (element.contains(topMostElement)) return;
    if (!topMostElement) return;

    const { height } = topMostElement.getBoundingClientRect();
    const offset = 10;
    btn.style.top = `${height + offset}px`;
  }

  addCopyButton(element) {
    const btn = this.createCopyButton(element);

    btn.addEventListener("click", (event) => {
      this.onCopyClick(event, element.dataset.element);
    });

    element.addEventListener("click", () => {
      this.dispatch(
        "breakdanceElementClicked",
        element.dataset.element
      );
    });

    element.appendChild(btn);

    // Prevent the button from being hidden by the top-most element.
    element.addEventListener("mouseenter", () => {
      this.onMouseEnter(element, btn);
    });

    element.addEventListener("mouseleave", () => {
      btn.style.top = "";
    });
  }

  mapToTree(nodes) {
    return nodes.map((node) => JSON.parse(node.dataset.element));
  }

  init() {
    this.elements = [...document.querySelectorAll("[data-element]")]
      .filter(el => {
        const ignore = el.closest("[data-breakdance-foreign-document]");

        if (ignore) {
          el.removeAttribute('data-element');
          return false;
        }
        return true;
      });

    this.treeNodes = this.mapToTree(this.elements);

    this.elements.forEach(this.addCopyButton);
    this.maybePreparePageForIframeRequest();

    this.dispatch("breakdanceGetElements", this.treeNodes);
  }
}

new BreakdanceDesignLibrary();
