public class Main {
    public static void main(String[] args) {
        ListaEnlazadaPersona lista = new ListaEnlazadaPersona();

        lista.agregar(new Persona("Ana", 25, "M"));
        lista.agregar(new Persona("Laura", 19, "M"));
        lista.agregar(new Persona("Pedro", 16, "H"));
        lista.agregar(new Persona("Carlos", 20, "H"));
        lista.agregar(new Persona("Luis", 30, "H"));
        lista.agregar(new Persona("Marta", 18, "M"));
        lista.agregar(new Persona("Juan", 17, "H"));

        System.out.println("🔸 Lista original:");
        lista.mostrar();

        System.out.println("\n👩 Mujer con menor edad:");
        Persona menor = lista.mujerMenorEdad();
        if (menor != null) {
            System.out.println(menor);
        }

        System.out.println("\n👨‍🦱 Hombres con edad menor al promedio de mujeres:");
        for (Persona p : lista.hombresMenorQuePromedioMujeres()) {
            System.out.println(p);
        }

        System.out.println("\n🧹 Eliminando hombres menores de edad...");
        lista.eliminarHombresMenores();

        System.out.println("\n✅ Lista después de eliminar hombres menores:");
        lista.mostrar();
    }
}
