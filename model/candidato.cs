namespace ArujaGuia.Models
{
    public class Candidato
    {
        public int Id { get; set; }
        public string Nome { get; set; }
        public string Email { get; set; }
        public string Curriculo { get; set; } // URL ou caminho do currículo
        public ICollection<Candidatura> Candidaturas { get; set; }
    }
}
