module Omikuji
  @fortunes = %w[大吉 中吉 吉 小吉 凶]

  def self.draw
    @fortunes.sample
  end
end

Omikuji.draw
