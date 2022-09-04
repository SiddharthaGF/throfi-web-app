import axios from 'axios';
import React, { useEffect, useState } from 'react';
import route from 'ziggy-js';

interface Patient {
  id: number;
  name: string;
  last_name: string;
  city: string;
  birthdate: Date;
  ocupation: string;
  nutritional_diagnosis: string;
  type_of_surgery: string;
}

interface props {
  page: number;
  urlApi?: string;
}

function Home(p: props) {

  const urlApiBase = route("patients.index") + '?page=';
  const [ patients, setPatients ] = useState<Patient[]>([]);
  const [ currentPage, setCurrentPage ] = useState<number>(p.page);
  const [ nextPage, setNextPage ] = useState<number>();
  const [ prevPage, setPrevPage ] = useState<number>();

  useEffect(() => {
    getAllPatients();
  }, [])

  const getAllPatients = async () => {
    try {
      await axios.get(urlApiBase + currentPage)
      .then(response => {
        setPatients(response.data.data);
        if (response.data.prev_page_url)
          setPrevPage(response.data.prev_page_url);
        if (response.data.next_page_url)  
          setNextPage(response.data.next_page_url);
      });
    } catch(err) {

    }
  }

  const calculateAge = (birthday: Date) => {
    var today = new Date();
    var age = today.getFullYear() - birthday.getFullYear();
    var months = today.getMonth() - birthday.getMonth();
    if (months < 0 || (months === 0 && today.getDate() < birthday.getDate())) {
      age--;
    }
    return age;
  }

  return (
    <>
      <div className="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table className='table table-hover-state'>
          <thead className='thead-hover-state'>
            <tr>
              <th scope="col" className='rh-3'>Nombre</th>
              <th scope="col" className='rh-3'>Ciudad</th>
              <th scope="col" className='rh-3'>Edad</th>
              <th scope="col" className='rh-3'>Ocupacion</th>
              <th scope="col" className='rh-3'>Diagnóstico</th>
              <th scope="col" className='rh-3'>Tipo dieta</th>
              <th scope="col" className="rh-3">
                <span className="sr-only">Editar</span>
              </th>
            </tr>
          </thead>
          <tbody>
            {patients.map((patient) => (
              <tr className='tr r-hover-state r-border' key={patient.id}>
                <th scope='row' className='rh-4 row'>{patient.name} {patient.last_name}</th>
                <td className='rh-4'>{patient.city}</td>
                <td className='rh-4'>{calculateAge(new Date(patient.birthdate))}</td>
                <td className='rh-4'>{patient.ocupation}</td>
                <td className='rh-4'>{patient.nutritional_diagnosis}</td>
                <td className='rh-4'>{patient.type_of_surgery ? patient.type_of_surgery : 'Ninguno'}</td>
                <td className='rh-4 text-right'>
                  <a href="#" className="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
        <a href={'page=' + (currentPage-1)}>
          <button className="btn btn-blue mr-4" disabled={prevPage===undefined}>Prev</button>
        </a>
        <a href={'page=' + (currentPage+1)}>
          <button className="btn btn-blue" disabled={nextPage===undefined}>Next</button>
        </a>
      </div>
    </>
  );
}

export default Home