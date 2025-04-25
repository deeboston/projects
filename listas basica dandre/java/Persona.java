public class Persona {
    private String nombre;
    private int edad;
    private String sexo;

    public Persona(String nombre, int edad, String sexo) {
        this.nombre = nombre;
        this.edad = edad;
        this.sexo =sexo.toUpperCase();

    }

    public String getNombre() {
        return nombre;
    }

    public int getEdad() {
        return edad;
    }

    public String getSexo() {
        return sexo;
    }
    
    public String toString() {
        return nombre + ", " + edad + " anos, " +(sexo.equals("M")? "Mujer" : "Hombre");
    }
}
