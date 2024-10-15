using ArujaGuia.Models;
using Microsoft.AspNetCore.Mvc;
using System.Linq;

namespace ArujaGuia.Controllers
{
    public class CandidaturasController : Controller
    {
        private readonly ApplicationDbContext _context;

        public CandidaturasController(ApplicationDbContext context)
        {
            _context = context;
        }

        // Candidatar-se a uma vaga
        [HttpPost]
        public IActionResult Candidatar(int vagaId, int candidatoId)
        {
            var candidatura = new Candidatura
            {
                VagaId = vagaId,
                CandidatoId = candidatoId,
                DataCandidatura = DateTime.Now,
                Status = "Em análise"
            };

            _context.Candidaturas.Add(candidatura);
            _context.SaveChanges();
            return RedirectToAction("Index", "Vagas");
        }

        // Ver candidaturas de uma vaga
        public IActionResult VerCandidaturas(int vagaId)
        {
            var candidaturas = _context.Candidaturas
                .Where(c => c.VagaId == vagaId)
                .ToList();
            return View(candidaturas);
        }
    }
}
