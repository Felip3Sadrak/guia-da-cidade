namespace ArujaGuia.Models
{
    public class Empresa
    {
        public int Id { get; set; }
        public string Nome { get; set; }
        public string CNPJ { get; set; }
        public string Email { get; set; }
        public ICollection<Vaga> Vagas { get; set; }
    }
}
