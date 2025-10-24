import {Controller} from "@hotwired/stimulus";


export default class extends Controller {

    initialize() {
        setTimeout(() => {
            this.element.remove()
        }, 5000)

        console.log("Hello Welt")
    }
}