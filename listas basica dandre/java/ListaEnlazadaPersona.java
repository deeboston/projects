import java.util.ArrayList;

public class ListaEnlazadaPersona {
    private Nodo cabeza;

    public void agregar(Persona persona) {
        Nodo nuevo = new Nodo(persona);
        if (cabeza == null) {
            cabeza = nuevo;
        } else {
            Nodo actual = cabeza;
            while (actual.getSiguiente() != null) {
                actual = actual.getSiguiente();
            }
            actual.setSiguiente(nuevo);
        }
    }

    public void mostrar() {
        Nodo actual = cabeza;
        while (actual != null) {
            System.out.println(actual.getPersona());
            actual = actual.getSiguiente();
        }
    }

    public Persona mujerMenorEdad() {
        Nodo actual = cabeza;
        Persona menor = null;
        while (actual != null) {
            Persona p = actual.getPersona();
            if (p.getSexo().equals("M")) {
                if (menor == null || p.getEdad() < menor.getEdad()) {
                    menor = p;
                }
            }
            actual = actual.getSiguiente();
        }
        return menor;
    }

    public ArrayList<Persona> hombresMenorQuePromedioMujeres() {
        Nodo actual = cabeza;
        int suma = 0;
        int conteo = 0;

        while (actual != null) {
            Persona p = actual.getPersona();
            if (p.getSexo().equals("M")) {
                suma += p.getEdad();
                conteo++;
            }
            actual = actual.getSiguiente();
        }

        double promedio = conteo == 0 ? 0 : (double) suma / conteo;

        actual = cabeza;
        ArrayList<Persona> resultado = new ArrayList<>();
        while (actual != null) {
            Persona p = actual.getPersona();
            if (p.getSexo().equals("H") && p.getEdad() < promedio) {
                resultado.add(p);
            }
            actual = actual.getSiguiente();
        }

        return resultado;
    }

    public void eliminarHombresMenores() {
        Nodo actual = cabeza;
        Nodo anterior = null;

        while (actual != null) {
            Persona p = actual.getPersona();
            if (p.getSexo().equals("H") && p.getEdad() < 18) {
                if (anterior == null) {
                    cabeza = actual.getSiguiente();
                } else {
                    anterior.setSiguiente(actual.getSiguiente());
                }
            } else {
                anterior = actual;
            }
            actual = actual.getSiguiente();
        }
    }
}
