namespace ArujaGuia.Models
{
    public class Vaga
    {
        public int Id { get; set; }
        public string Titulo { get; set; }
        public string Descricao { get; set; }
        public DateTime DataPublicacao { get; set; }
        public Empresa Empresa { get; set; }
        public ICollection<Candidatura> Candidaturas { get; set; }
    }
}
