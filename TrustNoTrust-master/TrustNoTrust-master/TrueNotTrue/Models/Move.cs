using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace TrueNotTrue.Models
{
    public class Move : MoveCard
    {
        public int Id { get; set; }
        public string PlayerId { get; set; }
        public int GameId { get; set; }
        public bool? Trust { get; set; }
        public int CountCard { get; set; }
    }
}