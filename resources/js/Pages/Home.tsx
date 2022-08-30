import React from "react";
import route from "ziggy-js";

export default function App() {

  const Escribir = () => {
    console.log(route('settings'));
  }

  return (
    <>
        <button className="btn btn-blue" onClick={Escribir}>
            Clic me!
        </button>
    </>
  );
}