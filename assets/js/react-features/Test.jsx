import React from "react"
import { render } from 'react-dom'

const Test = ()=><h1>Bonjour tout le monde</h1>

class TestElement extends HTMLElement {

  connectedCallback() {

    this.innerHTML("bonjour , ceci est un teste")
    // render(<Test/>,this)
  }
}

// customElements.define("balisage", TestElement)


// class XSearch extends HTMLElement {
//   connectedCallback() {
//     const mountPoint = document.createElement('span');
//     this.attachShadow({ mode: 'open' }).appendChild(mountPoint);

//     const name = this.getAttribute('name');
//     const url = 'https://www.google.com/search?q=' + encodeURIComponent(name);
//     ReactDOM.render(<a href={url}>{name}</a>, mountPoint);
//   }
// }
// customElements.define('x-search', XSearch);


class TestComponent extends React.Component {

  render(){
    return <h1>ceci est un test</h1>
  }
}



render(<TestComponent />, document.getElementById('testing'))
